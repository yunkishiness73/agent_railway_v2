  <!-- End Main Header Search Content-->
        <!-- Footer -->
        <div class="row bg-dark" style="height: 100px;">
            <div class="col-md-12 align-self-center" style="padding-top: 3%;padding-bottom: 1%;">
                <p class="text-center text-light"> <strong style="color: #6d9eed;">Nguyễn Kiệt - Lộc Ngô </strong>Agent Railway Company &copy; 2018</p>
            </div>
        </div>

        <!-- End Footer -->

    </div>

   
    <script type="text/javascript">
        
        function triggerDatepicker(){

            $('.datepicker').datepicker({

                dateFormat: "yy-mm-dd",
                minDate: 0
            })
        }

        triggerDatepicker();

        function autocomplete(input,bigComponent,data){
            var currentFocus = -1;
            input.addEventListener("input",function(){
                var containerItems,select,optionItem;
                var value = this.value;
                closeAllLists();

                if(!value){
                    return false;
                }

                currentFocus = -1;

                containerItems = document.createElement("DIV");
                containerItems.setAttribute("class","form-group autocomplete-items");
                containerItems.setAttribute("id",this.id + "AutocompleteItems");
                bigComponent.appendChild(containerItems);


                for(var i = 0 ; i < data.length; i++){
                    if(value.toLowerCase() == data[i].substring(0,value.length).toLowerCase()){
                        option = document.createElement("DIV");
                        option.innerHTML = "<i class='fa fa-map-marker'></i> <strong>" + data[i].substr(0,value.length) + "</strong>";
                        option.innerHTML += data[i].substr(value.length);
                        option.innerHTML += "<input type='hidden' value='" + data[i] + "'>";

                        option.addEventListener("click",function(){
                            input.value = this.getElementsByTagName("input")[0].value;
                            closeAllLists();
                        });

                        containerItems.appendChild(option);
                        
                    }
                }

            });

            input.addEventListener("keydown",function(e){
                var containerItems = document.getElementById(this.id + "AutocompleteItems");
                if(containerItems){
                    containerItems = containerItems.getElementsByTagName("div");
                    //console.log(e);
                }
                if(e.keyCode == 40){
                    currentFocus += 1;
                    addActive(containerItems);
                }else if(e.keyCode == 38){
                    currentFocus -= 1;
                    addActive(containerItems);
                }else if(e.keyCode == 13){
                    e.preventDefault();
                    if(currentFocus > -1){
                        if(containerItems){
                            containerItems[currentFocus].click();
                        }
                    }
                }

            });

            function addActive(x){
            
                if(!x){
                    return false;
                }
                removeActive(x);
                if(currentFocus >= x.length){
                    currentFocus = 0;
                }
                if(currentFocus < 0){
                    currentFocus = x.length - 1;
                }
                //console.log(x);
                x[currentFocus].classList.add("autocomplete-active");
            }

            function removeActive(x){
                for(var i = 0; i < x.length; i++){
                    x[i].classList.remove("autocomplete-active");
                }
            }

            function closeAllLists(e){
                var flag = false;
                var x = bigComponent.getElementsByClassName("autocomplete-items");
                if(x.length > 0){
                    x = x[0];
                    for(var i = 0; i < data.length ; i++){
                        if(e != x[i] || e != input){
                            flag = true;
                            break;
                        }
                    }
                }

                if(flag){
                    //console.log(bigComponent.getElementsByClassName("autocomplete-items"));
                    if(bigComponent.getElementsByClassName("autocomplete-items").length > 0){
                        //console.log(bigComponent.getElementsByClassName("autocomplete-items"));
                        bigComponent.removeChild(bigComponent.getElementsByClassName("autocomplete-items")[0]);
                    }
                }
            }

            document.addEventListener("click", function (e) {
                    closeAllLists(e.target);
            });
        }        

        function changeBackgroundImage(){
            var i = 0;
            var newImage;
            var background = document.getElementsByClassName("container-box-book-ticket")[0];
            var intervalChangeBackgroundImage = setInterval(function(){
                $(".container-box-book-ticket-bg").fadeOut(300,function(){
                    i++;
                    if(i > 4){
                        i = 0;
                    }
                    //console.log(i);
                    newImage = "<?php echo base_url(); ?>" + "public/background_image/background_" + i + ".jpg";
                    $(".container-box-book-ticket-bg").css("background-image","url('"+newImage+"')");
                    $(".container-box-book-ticket-bg").fadeIn(1000);
                });
            },6000);
        }
        changeBackgroundImage();

        function chooseTypeTicket(){
            var motChieu = document.getElementById("type-ticket-mot-chieu");
            var khuHoi = document.getElementById("type-ticket-khu-hoi");
            
            motChieu.addEventListener("click",function(){
                $("#contaier-ngay-ve").fadeOut(1000);
            });

            khuHoi.addEventListener("click",function(){
                $("#contaier-ngay-ve").fadeIn(1000);
            });

        }

        function initSearch(){
            var inputNoiDi = document.getElementById("input-noi-di");
            var inputNoiDen = document.getElementById("input-noi-den");
            var objGa = '<?php echo $ga; ?>';
            objGa = JSON.parse(objGa);

            var data = [];
                var valueInputGaDen = document.getElementById("input-noi-den").value;
                for(var i = 0; i < objGa.length; i++){
                    if(objGa[i]["ten_ga"].toLowerCase() != valueInputGaDen.toLowerCase()){
                        data.push(objGa[i]["ten_ga"]);
                    }
            }

            autocomplete(document.getElementById("input-noi-di"),document.getElementById("group-input-noi-di"), data);

            autocomplete(document.getElementById("input-noi-den"),document.getElementById("group-input-noi-den"), data);


            inputNoiDi.addEventListener("input",function(){
                var data = [];
                var valueInputGaDen = document.getElementById("input-noi-den").value;
                for(var i = 0; i < objGa.length; i++){
                    if(objGa[i]["ten_ga"].toLowerCase() != valueInputGaDen.toLowerCase()){
                        data.push(objGa[i]["ten_ga"]);
                    }
                }
                //console.log(data);
                autocomplete(document.getElementById("input-noi-di"),document.getElementById("group-input-noi-di"), data);
            });

            inputNoiDen.addEventListener("input",function(){
                var data = [];
                var valueInputGaDi = document.getElementById("input-noi-di").value;
                for(var i = 0; i < objGa.length; i++){
                    if(objGa[i]["ten_ga"].toLowerCase() != valueInputGaDi.toLowerCase()){
                        data.push(objGa[i]["ten_ga"]);
                    }
                }
                autocomplete(document.getElementById("input-noi-den"),document.getElementById("group-input-noi-den"), data);
                //console.log(data);
            });
        }

        initSearch();

        chooseTypeTicket();

        function checkExistsStation(ga){
            var objGa = '<?php echo $ga; ?>';
            objGa = JSON.parse(objGa);
            for(var i = 0; i < objGa.length; i++){
                if(objGa[i]["ten_ga"] == ga.value){
                    return true;
                }
            }
            return false;
        }
        
        function validateInput(){
            var btnTimKiem = document.getElementById("btn-tim-kiem");
            btnTimKiem.addEventListener("click",function(){
                //check what's type ticket
                var typeTicket;
                var inputNoiDi = document.getElementById("input-noi-di");
                var inputNoiDen = document.getElementById("input-noi-den");
                var ngayDi = document.getElementById("input-ngay-khoi-hanh");
                var ngayVe = document.getElementById("input-ngay-ve");
                if(document.getElementById("type-ticket-khu-hoi").checked){
                    if(inputNoiDi.value && inputNoiDen.value && ngayVe.value && ngayDi.value){
                        if(checkExistsStation(inputNoiDi) && checkExistsStation(inputNoiDen)){
                            
                            if(Date.parse(ngayVe.value) >= (Date.parse(ngayDi.value) + 2*24*60*60*1000)){
                                var ngayDi = document.getElementById("input-ngay-khoi-hanh");
                                var ngayVe = document.getElementById("input-ngay-ve");
                                document.getElementById("depart-info").submit();
                            }else{
                                var errorMessage = document.getElementById("content-error-message");
                                errorMessage.innerHTML = "Ngay ve phai hon ngay di 2 ngay";
                                $("#error-message-modal").modal('show');
                            }
                        }else{
                            var errorMessage = document.getElementById("content-error-message");
                            errorMessage.innerHTML = "Thong tin ga di va ga den khong chinh xac";
                            $("#error-message-modal").modal('show');
                        }
                    }else{
                        var errorMessage = document.getElementById("content-error-message");
                        errorMessage.innerHTML = "Hay nhap day du thong tin de tien hanh dat ve";
                        $("#error-message-modal").modal('show');
                    }
                }else{
                    if(inputNoiDi.value && inputNoiDen.value && ngayDi.value){
                        if(checkExistsStation(inputNoiDi) && checkExistsStation(inputNoiDen)){
                            // TRue and redirect
                        }else{
                            var errorMessage = document.getElementById("content-error-message");
                            errorMessage.innerHTML = "Thong tin ga di va ga den khong chinh xac";
                            $("#error-message-modal").modal('show');
                        }    
                    }else{
                        var errorMessage = document.getElementById("content-error-message");
                        errorMessage.innerHTML = "Hay nhap day du thong tin de tien hanh dat ve";
                        $("#error-message-modal").modal('show');
                    }
                }
            });
        }

        validateInput();

        function swapGa(){
            document.getElementById("swap-ga").addEventListener("click",function(){
                var inputNoiDi = document.getElementById('input-noi-di');
                var inputNoiDen = document.getElementById('input-noi-den');
                var temp = inputNoiDi.value;
                inputNoiDi.value = inputNoiDen.value;
                inputNoiDen.value = temp;
            });
        }

        swapGa();

        function convertDate(date){
            var arrayDate = date.value.split("/");
            return arrayDate[2] + "-" + arrayDate[0] + "-" + arrayDate[1];
        }

    </script>

</body>
</html>