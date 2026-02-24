@extends('admin.layouts.admin')

@section('content')
    <h1 style="font-size: 1.75rem; font-weight: 900; margin-bottom: 1.5rem; letter-spacing: -0.02em;">Artists</h1>

    <div class="section-box">
        <div class="section-box-header">Add Artist</div>
        <div class="section-box-body">
            <form method="POST" action="{{ route('admin.artists.store') }}" style="display: flex; gap: 1rem; align-items: flex-end; flex-wrap: wrap;">
                @csrf
                <div style="flex: 1; min-width: 200px;">
                    <label for="name">Artist Name</label>
                    <input type="text" id="name" name="name" class="admin-input" placeholder="e.g. CITI3EN..." required>
                </div>
                <button type="submit" class="btn-green">Add</button>
            </form>
        </div>
    </div>

    <div class="section-box">
        <div class="section-box-header">
            <span>All Artists ({{ $artists->count() }})</span>
            <div class="search-wrap">
                <i class="bi bi-search"></i>
                <input type="text" id="artist-search" placeholder="Search artists..." class="admin-input" style="margin-top:0.5rem;">
            </div>
        </div>
        <div class="table-wrap">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Songs</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="artist-tbody">
                    @forelse ($artists as $i => $artist)
                        <tr class="artist-row">
                            <td style="color: #b3b3b3;">{{ $i + 1 }}</td>
                            <td style="font-weight: 600;" class="artist-name">{{ $artist->name }}</td>
                            <td style="color: #b3b3b3;">{{ $artist->songs_count }}</td>
                            <td style="text-align: right;">
                                <form method="POST" action="{{ route('admin.artists.destroy', $artist->id) }}" onsubmit="return confirm('Delete?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn-del"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4" style="color: #b3b3b3; text-align: center; padding: 2rem;">No artists yet.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div id="no-results" style="display:none; color:#b3b3b3; text-align:center; padding:2rem; font-size:0.875rem;">No artists found.</div>
    </div>

    <script>
        document.getElementById('artist-search').addEventListener('input', function () {
            const q = this.value.toLowerCase().trim();
            const rows = document.querySelectorAll('#artist-tbody .artist-row');
            let visible = 0;
            rows.forEach(row => {
                const match = row.querySelector('.artist-name').textContent.toLowerCase().includes(q);
                row.style.display = match ? '' : 'none';
                if (match) visible++;
            });
            document.getElementById('no-results').style.display = visible === 0 ? 'block' : 'none';
        });
    </script>
@endsection