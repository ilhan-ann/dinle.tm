@extends('admin.layouts.admin')

@section('content')
    <h1 style="font-size: 1.75rem; font-weight: 900; margin-bottom: 1.5rem; letter-spacing: -0.02em;">Videos</h1>

    <div class="section-box">
        <div class="section-box-header">Upload Video</div>
        <div class="section-box-body">
            <form method="POST" action="{{ route('admin.videos.store') }}" enctype="multipart/form-data">
                @csrf
                <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(160px, 1fr)); gap: 1rem; margin-bottom: 1rem;">
                    <div>
                        <label>Video Name</label>
                        <input type="text" name="name" class="admin-input" placeholder="Video title" required>
                    </div>
                    <div>
                        <label>Artist</label>
                        <select name="artist_id" class="admin-input" required>
                            <option value="">Select artist</option>
                            @foreach ($artists as $artist)
                                <option value="{{ $artist->id }}">{{ $artist->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label>Video File (mp4)</label>
                        <input type="file" name="video" class="admin-input" accept=".mp4,.mov,.avi" required style="padding: 0.4rem 0.75rem;">
                    </div>
                </div>
                <button type="submit" class="btn-green"><i class="bi bi-upload me-1"></i>Upload</button>
            </form>
        </div>
    </div>

    <div class="section-box">
        <div class="section-box-header">
            <span>All Videos ({{ $videos->count() }})</span>
            <div class="search-wrap">
                <i class="bi bi-search"></i>
                <input type="text" id="video-search" placeholder="Search videos..." class="admin-input" style="margin-top:0.5rem;">
            </div>
        </div>
        <div class="table-wrap">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Artist</th>
                        <th>Views</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="video-tbody">
                    @forelse ($videos as $i => $video)
                        <tr class="video-row">
                            <td style="color: #b3b3b3;">{{ $i + 1 }}</td>
                            <td style="font-weight: 600;" class="video-name">{{ $video->name }}</td>
                            <td style="color: #b3b3b3;" class="video-artist">{{ $video->artist->name }}</td>
                            <td style="color: #b3b3b3;">{{ number_format($video->view_count) }}</td>
                            <td style="text-align: right;">
                                <form method="POST" action="{{ route('admin.videos.destroy', $video->id) }}" onsubmit="return confirm('Delete?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn-del"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" style="color: #b3b3b3; text-align: center; padding: 2rem;">No videos yet.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div id="no-results" style="display:none; color:#b3b3b3; text-align:center; padding:2rem; font-size:0.875rem;">No videos found.</div>
    </div>

    <script>
        document.getElementById('video-search').addEventListener('input', function () {
            const q = this.value.toLowerCase().trim();
            const rows = document.querySelectorAll('#video-tbody .video-row');
            let visible = 0;
            rows.forEach(row => {
                const match = row.querySelector('.video-name').textContent.toLowerCase().includes(q)
                           || row.querySelector('.video-artist').textContent.toLowerCase().includes(q);
                row.style.display = match ? '' : 'none';
                if (match) visible++;
            });
            document.getElementById('no-results').style.display = visible === 0 ? 'block' : 'none';
        });
    </script>
@endsection