<style>

div.search__container{
    padding-top: 5%;
}

td{
    padding: 5px 10px;
    text-align: center;
    font-size: 9pt;
    height: 50px;
}

input.search__input{
    width: 100%;
    padding: 12px 24px;
    font-size: 14px;
    line-height: 18px;
    color: #575756;
    background-color: transparent;
    background-position: 95% center;
    border-radius: 50px;
    border: 1px solid #575756;
    transition: all 250ms ease-in-out;
    backface-visibility: hidden;
    transform-style: preserve-3d;
}

input.search__input::placeholder{
    color: rgba(87, 87, 86, 0.8);
    text-transform: uppercase;
    letter-spacing: 1.5px;
}

input.search__input:hover,
input.search__input:focus{
    padding: 12px 0;
    outline: 0;
    border: 1px solid transparent;
    border-bottom: 1px solid #575756;
    border-radius: 0;
    background-position: 100% center;
}

.btn {
  border: none;
  outline: none;
  margin-top: 10px;
  padding: 12px 16px;
  background-color: #f1f1f1;
  cursor: pointer;
  border-radius: 50px;
    border: 1px solid #575756;
}

.btn:hover {
  background-color: #ddd;
}

.btn.active {
  background-color: #666;
  color: white;
}

</style>

<div class="container-fluid row searchbox" style="padding-left:20%;padding-right:20%;">
        <div class="search__container col-md-9">
            <input id="myInput" class="search__input" onkeyup="searchbar__Function()" type="text" placeholder="What are you looking for?">
                <div id="myBtnContainer">
                    <button class="btn active" >All</button>
                    <button class="btn" >BSCS</button>
                    <button class="btn" >BSIT</button>
                    <button class="btn" >BSEMC</button>
                    <button class="btn" >BSIS</button>
                    <button class="btn" >T-shirt</button>
                    <button class="btn" >Lanyard</button>

                </div>
        </div>    
</div>

<script>
    var btnContainer = document.getElementById("myBtnContainer");
    var btns = btnContainer.getElementsByClassName("btn");
    for (var i = 0; i < btns.length; i++) {
      btns[i].addEventListener("click", function(){
        var current = document.getElementsByClassName("active");
        current[0].className = current[0].className.replace(" active", "");
        this.className += " active";
      });
    }

</script>