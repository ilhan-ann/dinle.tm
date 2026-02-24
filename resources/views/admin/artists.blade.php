@extends('admin.layouts.admin')

@section('content')
    <h1 style="font-size: 1.75rem; font-weight: 900; margin-bottom: 1.5rem; letter-spacing: -0.02em;">Artists</h1>

    <div class="section-box">
        <div class="section-box-header">Add Artist</div>
        <div class="section-box-body">
            <form method="POST" action="{{ route('admin.artists.store') }}" enctype="multipart/form-data" style="display: flex; gap: 1rem; align-items: flex-end; flex-wrap: wrap;">
                @csrf
                <div style="flex: 1; min-width: 200px;">
                    <label for="name">Artist Name</label>
                    <input type="text" id="name" name="name" class="admin-input" placeholder="e.g. CITI3EN..." required>
                </div>
                <div style="min-width: 200px;">
                    <label for="photo">Artist Photo</label>
                    <input type="file" id="photo" name="photo" class="admin-input" accept="image/*">
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
                            <td style="text-align: right; display: flex; gap: 0.5rem; justify-content: flex-end;">
                                <button type="button" class="btn-edit" onclick="openEditModal({{ $artist->id }}, '{{ addslashes($artist->name) }}')">
    <i class="bi bi-pencil"></i>
</button>
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

    {{-- Edit Modal --}}
    <div id="edit-modal" style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.6); z-index:1000; align-items:center; justify-content:center;">
        <div style="background:#1a1a1a; border-radius:0.75rem; padding:2rem; width:100%; max-width:420px; position:relative;">
            <h2 style="font-size:1.1rem; font-weight:700; margin-bottom:1.5rem;">Edit Artist</h2>
            <form id="edit-form" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')
                <div style="margin-bottom:1rem;">
                    <label for="edit-name">Artist Name</label>
                    <input type="text" id="edit-name" name="name" class="admin-input" required>
                </div>
                <div style="margin-bottom:1.5rem;">
                    <label for="edit-photo">Artist Photo</label>
                    <input type="file" id="edit-photo" name="photo" class="admin-input" accept="image/*">
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

        function openEditModal(id, name) {
            document.getElementById('edit-name').value = name;
            document.getElementById('edit-form').action = '/admin/artists/' + id;
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