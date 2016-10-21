function myFunction() {
    var x = document.getElementById("idk").value;
	if (confirm("Anda yakin ingin menghapus komentar ?") == true) 
	{
    document.location.href = "delete_komentar.php?idk=x";
	} 
	
	else
	{
    
	}
   
}
