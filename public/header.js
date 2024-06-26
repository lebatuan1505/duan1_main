
  // Khi hover vào liên kết dropdown, hiển thị dropdown menu
  document.addEventListener("DOMContentLoaded", function() {
    const dropdownLink = document.querySelector('.nav-link.dropdown-toggle');
    const dropdownMenu = document.querySelector('.dropdown-menu');

    dropdownLink.addEventListener('mouseenter', function() {
      dropdownMenu.classList.add('show');
    });

    dropdownLink.addEventListener('mouseleave', function() {
      dropdownMenu.classList.remove('show');
    });

    dropdownMenu.addEventListener('mouseenter', function() {
      dropdownMenu.classList.add('show');
    });

    dropdownMenu.addEventListener('mouseleave', function() {
      dropdownMenu.classList.remove('show');
    });
  });
  document.addEventListener("DOMContentLoaded", function() {
    const navLinks = document.querySelectorAll('.nav-link');

    // Xử lý sự kiện khi nhấp vào liên kết
    navLinks.forEach(function(navLink) {
      navLink.addEventListener('click', function() {
        // Xóa lớp 'active' từ tất cả các liên kết
        navLinks.forEach(function(link) {
          link.classList.remove('active');
        });
        // Thêm lớp 'active' cho liên kết được nhấp vào
        this.classList.add('active');
      });
    });
  });