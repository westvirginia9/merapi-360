function increaseQuantity() {
    var quantityInput = document.getElementById('quantity');
    var currentQuantity = parseInt(quantityInput.value);

    // Tambahkan 1 ke jumlah pesanan
    quantityInput.value = currentQuantity + 1;
  }

  function decreaseQuantity() {
    var quantityInput = document.getElementById('quantity');
    var currentQuantity = parseInt(quantityInput.value);

    // Pastikan jumlah pesanan tidak kurang dari 1
    if (currentQuantity > 1) {
      // Kurangkan 1 dari jumlah pesanan
      quantityInput.value = currentQuantity - 1;
    }
  }