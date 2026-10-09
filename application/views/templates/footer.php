<!-- Footer Simple -->
    <footer class="bg-dark text-white py-5 text-center" style="background:rgb(0 37 74) !important">
    <div class="container">
        <div class="social-wrapper">
            <ul class="social-container">
                <li>
                    <a href="https://www.facebook.com/DPNPERADI" target="_blank" class="social-link bg-facebook">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
                </li>
                <li>
                    <a href="https://twitter.com/dpn_peradi" target="_blank" class="social-link bg-x-twitter">
                        <i class="fa-brands fa-x-twitter"></i>
                    </a>
                </li>
                <li>
                    <a href="https://www.instagram.com/dpnperadi/" target="_blank" class="social-link bg-instagram">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                </li>
                <li>
                    <a href="https://www.youtube.com/channel/UCadqocjnX4N7rg7PUh6PN7g" target="_blank" class="social-link bg-youtube">
                        <i class="fa-brands fa-youtube"></i>
                    </a>
                </li>
                <li>
                    <a href="https://www.tiktok.com/@dpnperadi" target="_blank" class="social-link bg-tiktok">
                        <i class="fa-brands fa-tiktok"></i>
                    </a>
                </li>
            </ul>
        </div>
        <p class="mb-0 opacity-50" style="font-size: 0.85rem; letter-spacing: 0.5px;">
            &copy; 2026 PERADI - POLA Summit Indonesia. All Rights Reserved.
        </p>
    </div>
</footer>

      <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>
  
  <script>
  document.addEventListener('DOMContentLoaded', function() {
    const tabBtns = document.querySelectorAll('.tab-btn');
    const tabContents = document.querySelectorAll('.tab-content');

    tabBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            // Remove active class from all buttons and contents
            tabBtns.forEach(b => b.classList.remove('active'));
            tabContents.forEach(content => content.classList.remove('active'));

            // Add active class to clicked button and corresponding content
            btn.classList.add('active');
            const tabId = btn.getAttribute('data-tab');
            document.getElementById(tabId).classList.add('active');
        });
    });
});
  </script>
</body>
</html>