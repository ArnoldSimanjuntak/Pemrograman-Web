// // JavaScript untuk mengontrol modul pop-up
// document.addEventListener('DOMContentLoaded', function() {
//     const overlay = document.getElementById('overlay');
//     const popup = document.getElementById('popup');
//     const editForm = document.getElementById('editForm');
//     const newComment = document.getElementById('comment');
//     const commentId = document.getElementById('review_id');

//     // Fungsi untuk menampilkan modul pop-up
//     function showPopup() {
//         overlay.style.display = 'block';
//         popup.style.display = 'block';
//     }

//     // Fungsi untuk menyembunyikan modul pop-up
//     function hidePopup() {
//         overlay.style.display = 'none';
//         popup.style.display = 'none';
//     }

//     // Tambahkan event listener untuk tombol edit
//     const editButtons = document.querySelectorAll('.edit-button');
//     editButtons.forEach(function(button) {
//         button.addEventListener('click', function(event) {
//             event.preventDefault();
//             // Ambil ID komentar dari atribut data
//             const commentIdValue = this.getAttribute('data-comment-id');
//             const commentText = this.getAttribute('data-comment-text');
//             // Isi nilai ID komentar dan teks komentar di form edit
//             commentId.value = commentIdValue;
//             newComment.value = commentText;
//             // Tampilkan modul pop-up
//             showPopup();
//         });
//     });

//     // Tambahkan event listener untuk tombol close pada modul pop-up
//     const closeButton = document.getElementById('closeButton');
//     closeButton.addEventListener('click', function(event) {
//         event.preventDefault();
//         hidePopup();
//     });

//     // Tambahkan event listener untuk overlay agar bisa menutup modul pop-up saat diklik
//     overlay.addEventListener('click', function(event) {
//         event.preventDefault();
//         hidePopup();
//     });
// });
