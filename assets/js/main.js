"use-strict"

// Giúp đổi textContent khi thay đổi dropdown
function setDropdownText(e) {
  let btn = document.getElementById("genresDropdown")
  btn.textContent = e.textContent
}
