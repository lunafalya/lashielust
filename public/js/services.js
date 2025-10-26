// Dropdown toggle
document.getElementById("profile-icon").addEventListener("click", () => {
  document.getElementById("dropdown-menu").classList.toggle("show");
});

window.addEventListener("click", (e) => {
  if (!e.target.matches('#profile-icon')) {
    const dropdown = document.getElementById("dropdown-menu");
    if (dropdown.classList.contains('show')) {
      dropdown.classList.remove('show');
    }
  }
});

// Reveal animation
function reveal() {
  const reveals = document.querySelectorAll(".reveal");
  for (let i = 0; i < reveals.length; i++) {
    const windowHeight = window.innerHeight;
    const elementTop = reveals[i].getBoundingClientRect().top;
    const revealPoint = 100;

    if (elementTop < windowHeight - revealPoint) {
      reveals[i].classList.add("active");
    }
  }
}

window.addEventListener("scroll", reveal);
window.addEventListener("load", reveal);



document.addEventListener('DOMContentLoaded', function() {
    const buttons = document.querySelectorAll('.delete-btn');

    buttons.forEach(button => {
        button.addEventListener('click', function() {
            const id = this.getAttribute('data-id');

            // Pop-up konfirmasi
            if (confirm('Apakah Anda yakin ingin menghapus layanan ini?')) {
                fetch(`/admin/services/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                    },
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Hapus elemen dari view tanpa reload
                        this.closest('tr').remove();

                        // Notifikasi sukses
                        alert('Service deleted successfully!');
                    }
                })
                .catch(error => console.error('Error:', error));
            }
        });
    });
});

