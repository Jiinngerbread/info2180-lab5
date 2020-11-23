window.onload = function () {
    var countryLookupBtn = document.getElementById("lookup");
    countryLookupBtn.addEventListener("click", function () {
        let url = "world.php";
        let country = document.getElementById("country").value;
       
        let xhttpRqst = new XMLHttpRequest();
        //promise not working atm
        xhttpRqst.onreadystatechange = function () {
            if (this.readyState === this.DONE && this.status === 200) {
                let result = document.getElementById("result");
                result.innerHTML = this.responseText;
            }
        };

        
        xhttpRqst.open("GET", url + "?country=" + country + "&context="); 
        xhttpRqst.send();
    });

    var cityLookupBtn = document.getElementById("cities");
    cityLookupBtn.addEventListener("click", function () {
        let url = "world.php";
        let country = document.getElementById("country").value;


        let xhttpRqst = new XMLHttpRequest();
        xhttpRqst.onreadystatechange = function () {
            if (this.readyState === this.DONE && this.status === 200) {
                let result = document.getElementById("result");
                result.innerHTML = this.responseText;
            }
        };


        xhttpRqst.open("GET", url + "?country=" + country + "&context=cities");
        xhttpRqst.send();
    });

}
