<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'SISTER' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { background: radial-gradient(circle at top left, #1e1b4b, #0f172a); min-height: 100vh; color: white; }
        .glass-card { background: rgba(255, 255, 255, 0.03); backdrop-filter: blur(12px); border: 1px solid rgba(255, 255, 255, 0.1); }
    </style>
</head>
<body class="p-4 md:p-8 font-sans">
    <div class="max-w-7xl mx-auto">
        {{ $slot }}
    </div>
    <script>
    function openEditModal(data) {
        // Set Action URL
        document.getElementById('editForm').action = '/input-nilai/' + data.id;
        
        // Fill Data
        document.getElementById('editNama').innerText = data.mahasiswa.nama;
        document.getElementById('editMk').innerText = data.mata_kuliah.nama_mk;
        document.getElementById('input_tugas').value = data.tugas;
        document.getElementById('input_uts').value = data.uts;
        document.getElementById('input_uas').value = data.uas;

        // Show Modal
        document.getElementById('modalEdit').classList.remove('hidden');
        document.body.style.overflow = 'hidden'; // prevent scroll
    }

    function closeEditModal() {
        document.getElementById('modalEdit').classList.add('hidden');
        document.body.style.overflow = 'auto';
    }
</script>
</body>
</html>