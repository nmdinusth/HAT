// form-handler.js

// Hàm xử lý form search
function initSearchForm() {
  const searchButton = document.getElementById("search-button-find-hotel");
  
  if (searchButton) { // Kiểm tra nếu nút tồn tại trên trang
    searchButton.addEventListener("click", function(e) {
      e.preventDefault();
      const form = document.querySelector("form");
      
      if (form) { // Kiểm tra nếu form tồn tại
        form.submit();
      } else {
        console.error("Không tìm thấy form để submit!");
      }
    });
  }
}

// Khởi chạy khi DOM tải xong
document.addEventListener("DOMContentLoaded", function() {
  initSearchForm();
  // Có thể thêm các hàm khác ở đây
});