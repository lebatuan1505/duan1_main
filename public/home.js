document.addEventListener("DOMContentLoaded", function () {
    var addToCartButtons = document.querySelectorAll(".add-to-cart");

    addToCartButtons.forEach(function (button) {
      button.addEventListener("click", function (event) {
        event.preventDefault();
        var form = button.closest("form");
        var formData = new FormData(form);
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
          if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
              // Xử lý khi đặt hàng thành công
              alert("Added to cart successfully!");
            } else {
              // Xử lý khi có lỗi xảy ra
              alert("Error occurred while adding to cart!");
            }
          }
        };
        xhr.open("POST", form.action, true);
        xhr.send(formData);
      });
    });
  });