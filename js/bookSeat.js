function bookSeat(seat, bus_id, eleve_id) {

    var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "book_seat.php?seat=" + seat + "&bus_id=" + bus_id+ "&eleve_id=" + eleve_id , true);
        xmlhttp.send();
				document.location.reload(true);
}
