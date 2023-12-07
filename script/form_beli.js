function updateQuantity(change) {
  var quantityInput = document.getElementById('quantity');
  var hargaSatuan = parseFloat(document.getElementById('hargaSatuan').value);

  // Periksa apakah nilai quantity adalah angka valid
  if (!isNaN(quantityInput.value) && quantityInput.value > 0) {
      var newQuantity = parseInt(quantityInput.value) + change;

      // Pastikan quantity tidak kurang dari 1
      newQuantity = Math.max(newQuantity, 1);

      // Update nilai quantity pada elemen input
      quantityInput.value = newQuantity;

      // Hitung ulang harga dan total pembelian
      var hargaTiket = newQuantity * hargaSatuan;

      // Tampilkan harga tiket yang baru
      document.getElementById('hargaTiket').innerText = 'Harga Tiket (satuan) : Rp ' + hargaTiket.toFixed(2);

      // Update dan tampilkan total pembelian
      var totalPembelianElem = document.getElementById('totalPembelian');
      var totalPembelianInput = document.getElementById('totalPembelianInput');
      var totalPembelian = newQuantity * hargaSatuan;
      totalPembelianElem.innerText = 'Total Pembelian : Rp ' + totalPembelian.toFixed(2);

      // Update nilai total pembelian pada elemen input
      totalPembelianInput.value = totalPembelian;

      // Update dan tampilkan total harga
      var totalHargaElem = document.getElementById('totalHarga');
      var totalHargaInput = document.getElementById('totalHargaInput');
      var totalHarga = totalPembelian; // Total harga sama dengan total pembelian
      totalHargaElem.innerText = 'Total Harga : Rp ' + totalHarga.toFixed(2);

      // Update nilai total harga pada elemen input
      totalHargaInput.value = totalHarga;
  }
}