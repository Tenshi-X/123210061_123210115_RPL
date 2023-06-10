/* File script.js */

// Fungsi untuk menghitung subtotal dan total harga
function calculate() {
  // Mendapatkan semua elemen yang memiliki class product-row
  let productRows = document.getElementsByClassName("product-row");
  
  // Mendeklarasikan variabel untuk menyimpan total harga
  let totalPrice = 0;

  // Melakukan perulangan untuk setiap elemen product-row
  for (let i = 0; i < productRows.length; i++) {
    
    // Mendapatkan elemen product-row ke-i
    let productRow = productRows[i];

    // Mendapatkan elemen price dan quantity dari product-row ke-i
    let priceElement = productRow.getElementsByClassName("price")[0];
    let quantityElement = productRow.getElementsByClassName("quantity")[0];

    // Mendapatkan nilai price dan quantity dari elemen-elemen tersebut
    let price = parseFloat(priceElement.innerText.replace("Rp.", ""));
    let quantity = parseInt(quantityElement.value);

    // Menghitung subtotal harga dari price dan quantity
    let subtotal = price * quantity;

    // Menampilkan subtotal harga ke elemen subtotal dari product-row ke-i
    productRow.getElementsByClassName("subtotal")[0].innerText = "Rp." + subtotal;

    // Menambahkan subtotal harga ke variabel total harga
    totalPrice += subtotal;

  }

  // Menampilkan total harga ke elemen total-price
  document.getElementById("total-price").innerText = "Rp." + totalPrice;

}

// Fungsi untuk menghapus produk dari cart
function removeProduct(event) {
  
  // Mendapatkan elemen button yang diklik
  let buttonClicked = event.target;

  // Mendapatkan elemen product-row yang merupakan parent dari button yang diklik
  let productRow = buttonClicked.parentElement.parentElement;

  // Menghapus elemen product-row dari cart-table
  document.getElementById("cart-table").removeChild(productRow);

  // Memanggil fungsi calculate untuk menghitung ulang total harga
  calculate();

}

// Menjalankan fungsi calculate saat halaman web dimuat pertama kali
calculate();

// Menambahkan event listener untuk setiap elemen input yang memiliki class quantity
let quantityInputs = document.getElementsByClassName("quantity");
for (let i = 0; i < quantityInputs.length; i++) {
  
  // Menjalankan fungsi calculate saat nilai input berubah
  quantityInputs[i].addEventListener("change", calculate);

}

// Menambahkan event listener untuk setiap elemen button yang memiliki class remove
let removeButtons = document.getElementsByClassName("remove");
for (let i = 0; i < removeButtons.length; i++) {

   // Menjalankan fungsi removeProduct saat button diklik 
   removeButtons[i].addEventListener("click", removeProduct);

}
