function validateForm() {
    var seats = document.getElementsByName("seats[]");
    var seatSelected = false;

    for (var i = 0; i < seats.length; i++) {
      if (seats[i].checked) {
        seatSelected = true;
        break;
      }
    }

    if (!seatSelected) {
      alert("Vui lòng chọn ít nhất một ghế.");
      return false;
    }

    return true;
  }