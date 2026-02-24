@extends('admin.layouts.admin')

@section('content')
    <h1 style="font-size: 1.75rem; font-weight: 900; margin-bottom: 1.5rem; letter-spacing: -0.02em;">Songs</h1>

    <div class="section-box">
        <div class="section-box-header">Upload Song</div>
        <div class="section-box-body">
            <form method="POST" action="{{ route('admin.songs.store') }}" enctype="multipart/form-data">
                @csrf
                @if ($errors->any())
                    <div style="color: #e53e3e; margin-bottom: 1rem; font-size:0.875rem;">
                        @foreach ($errors->all() as $error)
                            <p>• {{ $error }}</p>
                        @endforeach
                    </div>
                @endif
                <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(160px, 1fr)); gap: 1rem; margin-bottom: 1rem;">
                    <div>
                        <label>Song Name</label>
                        <input type="text" name="name" class="admin-input" placeholder="Song title" required>
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
                        <label>Category</label>
                        <select name="category_id" class="admin-input" required>
                            <option value="">Select category</option>
                            @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label>Audio File (mp3/wav)</label>
                        <input type="file" name="audio" class="admin-input" accept=".mp3,.wav,.ogg" required style="padding: 0.4rem 0.75rem;">
                    </div>
                </div>
                <button type="submit" class="btn-green"><i class="bi bi-upload me-1"></i>Upload</button>
            </form>
        </div>
    </div>

    <div class="section-box">
        <div class="section-box-header">
            <span>All Songs ({{ $songs->count() }})</span>
            <div class="search-wrap">
                <i class="bi bi-search"></i>
                <input type="text" id="song-search" placeholder="Search songs..." class="admin-input" style="margin-top:0.5rem;">
            </div>
        </div>
        <div class="table-wrap">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Artist</th>
                        <th>Category</th>
                        <th>Listeners</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="songs-tbody">
                    @forelse ($songs as $i => $song)
                        <tr class="song-row">
                            <td style="color: #b3b3b3;">{{ $i + 1 }}</td>
                            <td style="font-weight: 600;" class="song-name">{{ $song->name }}</td>
                            <td style="color: #b3b3b3;" class="song-artist">{{ $song->artist->name }}</td>
                            <td style="color: #b3b3b3;">{{ $song->category->name ?? '—' }}</td>
                            <td style="color: #b3b3b3;">{{ number_format($song->listener_count) }}</td>
                            <td style="text-align: right;">
                                <form method="POST" action="{{ route('admin.songs.destroy', $song->id) }}" onsubmit="return confirm('Delete?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn-del"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" style="color: #b3b3b3; text-align: center; padding: 2rem;">No songs yet.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div id="no-results" style="display:none; color:#b3b3b3; text-align:center; padding:2rem; font-size:0.875rem;">No songs found.</div>
    </div>

    <script>
        document.getElementById('song-search').addEventListener('input', function () {
            const q = this.value.toLowerCase().trim();
            const rows = document.querySelectorAll('#songs-tbody .song-row');
            let visible = 0;
            rows.forEach(row => {
                const match = row.querySelector('.song-name').textContent.toLowerCase().includes(q)
                           || row.querySelector('.song-artist').textContent.toLowerCase().includes(q);
                row.style.display = match ? '' : 'none';
                if (match) visible++;
            });
            document.getElementById('no-results').style.display = visible === 0 ? 'block' : 'none';
        });
    </script>
@endsection