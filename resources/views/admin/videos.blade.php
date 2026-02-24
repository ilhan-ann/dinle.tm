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
                    <div>
                        <label>Cover Image</label>
                        <input type="file" name="cover" class="admin-input" accept="image/*" style="padding: 0.4rem 0.75rem;">
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
                            <td style="text-align: right; display: flex; gap: 0.5rem; justify-content: flex-end;">
                                <button type="button" class="btn-edit" onclick="openEditModal({{ $video->id }}, '{{ addslashes($video->name) }}', {{ $video->artist_id }})">
                                    <i class="bi bi-pencil"></i>
                                </button>
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

    {{-- Edit Modal --}}
    <div id="edit-modal" style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.6); z-index:1000; align-items:center; justify-content:center;">
        <div style="background:#1a1a1a; border-radius:0.75rem; padding:2rem; width:100%; max-width:480px; position:relative;">
            <h2 style="font-size:1.1rem; font-weight:700; margin-bottom:1.5rem;">Edit Video</h2>
            <form id="edit-form" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')
                <div style="display:grid; gap:1rem; margin-bottom:1.5rem;">
                    <div>
                        <label>Video Name</label>
                        <input type="text" id="edit-name" name="name" class="admin-input" required>
                    </div>
                    <div>
                        <label>Artist</label>
                        <select id="edit-artist" name="artist_id" class="admin-input" required>
                            @foreach ($artists as $artist)
                                <option value="{{ $artist->id }}">{{ $artist->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label>Cover Image</label>
                        <input type="file" id="edit-cover" name="cover" class="admin-input" accept="image/*" style="padding: 0.4rem 0.75rem;">
                    </div>
                </div>
                <div style="display:flex; gap:0.75rem; justify-content:flex-end;">
                    <button type="button" class="btn-del" onclick="closeEditModal()">Cancel</button>
                    <button type="submit" class="btn-green">Save</button>
                </div>
            </form>
        </div>
    </div>

    <style>
        .btn-edit {
            background: rgba(234, 179, 8, 0.15);
            color: #eab308;
            border: none;
            border-radius: 0.375rem;
            padding: 0.35rem 0.6rem;
            cursor: pointer;
            font-size: 1rem;
            line-height: 1;
            transition: background 0.2s;
        }
        .btn-edit:hover {
            background: rgba(234, 179, 8, 0.3);
        }
    </style>

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

        function openEditModal(id, name, artistId) {
            document.getElementById('edit-name').value = name;
            document.getElementById('edit-artist').value = artistId;
            document.getElementById('edit-form').action = '/admin/videos/' + id;
            const modal = document.getElementById('edit-modal');
            modal.style.display = 'flex';
        }

        function closeEditModal() {
            document.getElementById('edit-modal').style.display = 'none';
        }

        document.getElementById('edit-modal').addEventListener('click', function (e) {
            if (e.target === this) closeEditModal();
        });
    </script>
@endsection