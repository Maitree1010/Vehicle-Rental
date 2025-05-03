
<style>

.user-fm .Step{
    display:none;
}
.user-fm #form1 {
    position: relative;
    border-radius: 20px px;
    box-shadow: 0px 1px 7px 0px;
    background:white;
    padding: 28px;
}
.user-fm .book-cnt{
    display: flex;
    justify-content: space-between;            
}
.user-fm .book-cnt .bi{
    width: 49%;
}
.user-fm label.error {
    color: red;        
}
.user-fm p input.error, textarea.error {
    border: 1px solid red;
}
.user-fm p input.valid, textarea.valid {
    border: 1px solid green;
}
.user-fm .form-group p,.user-fm .form-group .book-cnt .bi {
    position: relative;
    /* margin: 20px 0; */
}

.user-fm .form-group p .plac-hold{
    position: absolute;
    color:transparent;
    top: 50%;
    left: 15px;
    transform: translateY(-50%);
    font-size: 16px;
    /* color:grey; */
    padding: 0 5px;
    pointer-events: none;
    transition: .5s;
    
}

.user-fm .form-group p input,.user-fm .form-group p select {
    height: 50px;
    font-size: 16px;
    color: black;
    padding: 0 15px;
    background: transparent !important;
    border: 1.2px solid black;
    outline: none;
    border-radius: 5px;
}
.user-fm .form-group .file-up{
    display: inline-flex;
    align-items:center;
    width: 100%;
    justify-content:space-between;
}
.user-fm .form-group .file-up .upload{
    display:flex;
    flex-direction:column;
    width:60% !important;
}
.user-fm .form-group .file-up .upload .btn{
    margin-top:5px;
    
}
.user-fm .form-group .file-up .img-cnt{
    background-color: rgba(216, 212, 212, 0.36) !important;
    height: 7rem;
    width:7rem;
    border: 1px solid black;
    /* overflow: hidden; */
    margin:5px 0;
    display: flex;
    align-items: center;
    justify-content: center;    
  }
  .user-fm .form-group .file-up .imghold{
    font-size: 15px;
    text-align:left;
    font-weight:700;
    padding:  0 .75rem;
    color:green;
  }
  .user-fm .form-group .file-up .img-cnt img{
    height: 100%;
  }

.user-fm .form-group p input:focus~.plac-hold,.user-fm .form-group p select:focus~.plac-hold,
.user-fm .form-group p input:valid~.plac-hold,.user-fm .form-group p select:valid~.plac-hold {
    top: 0;
    font-size: 13px;
    background:white;
    color:black;
}

        

</style>
<div class="user-fm">

    <div id="Message" style="text-align: center; color: green" ></div>

    <form id="form1" method="post" runat="server" enctype="multipart/form-data">

        <div class="form-group Step">
                <h5 style="text-align: center"></h5>                        
                <p class="book-cnt">
                    <span class="bi">
                        <select class="form-control book-info " name="category" required>
                            <option class="Categories" hidden value="">Categorios Of Vehicle</option>
                            <option value="Car (4 Wheelers , Jeep)">Car (4 Wheelers,Jeep)</option>
                            <option value="Bus">Bus</option>
                            <option value="Bykes">Bykes</option>
                            <option value="Truk">Truk</option>
                            <option value="Other">Other</option>
                        </select>
                        <label class="plac-hold" for="">Categories</label>
                    </span>
                    <span class="bi">
                        <select class="form-control book-info" name="vtype" required>
                            <option class="Categories" hidden value="">Vehicle Type</option>
                            <option value="Petrol">Petrol</option>
                            <option value="Hybrid">Hybrid</option>
                            <option value="Diesel">Diesel</option>
                            <option value="Electric">Electric</option>
                            <option value="CNG">CNG</option>
                            <option value="Other">Other</option>
                        </select>
                        <label class="plac-hold" for="">Vehicle Type</label>
                    </span>
                </p>
                <p class="book-cnt">
                    <span class="bi">
                        <select class="form-control book-info" name="transmition" required>
                            <option class="Categories" hidden value="">Transmission</option>
                            <option value="Manual">Manual</option>
                            <option value="Automatic">Automatic</option>
                            <option value="Other">Other</option>
                        </select>
                        <label class="plac-hold" for="">Transmission</label>
                    </span>
                    <span class="bi">
                        <input placeholder="Model Year" class="form-control book-info" required name="modelyear" type="number" />
                        <label class="plac-hold" for="">Modal Year</label>
                    </span>
                </p>
                <p class="book-cnt">
                    <span class="bi">
                        <input placeholder="Address" class="form-control book-info" required name="address" type="text" />
                        <label class="plac-hold" for="">Address</label>
                    </span>
                    <span class="bi">
                        <input placeholder="Model Name" class="form-control book-info" required name="modelname" type="text" />
                        <label class="plac-hold" for="">Modal Name</label>
                    </span>
                </p>
                <p class="book-cnt">
                    <span class="bi">
                        <input placeholder="Set Price (Per Day)" class="form-control book-info" required name="price" type="text" />
                        <label class="plac-hold" for="">Price</label>
                    </span>
                    <span class="bi">
                        <input placeholder="Colour" class="form-control book-info" required name="color" type="text" />
                        <label class="plac-hold" for="">Colour</label>
                    </span>
                </p>
                
        </div>

        <div class="form-group Step">
        <h5 style="text-align: center">Upload Certificate</h5>
        <div class="file-up">
            <div class="img-cnt">
                <img src="images/vhimg.jpg" alt="" srcset="" class="img-box">
            </div>
            <div class="upload">
                <div class="imghold">Vehicle Image</div>
                <input class="btn" required name="vhimg" type="file" />
            </div>
        </div>
        <div class="file-up">
            <div class="img-cnt">
                <img src="images/vehiclereg.jfif" alt="" srcset="" class="img-box">
            </div>
            <div class="upload">
                <div class="imghold">Registration Certificate</div>
                <input class="btn" required name="regcrt" type="file" />
            </div>            
        </div>
        <div class="file-up">
            <div class="img-cnt">
                <img src="images/inscrt1.png" alt="" srcset="" class="img-box">
            </div>
            <div class="upload">
                <div class="imghold">Insurance Coverage Certificate</div>
                <input class="btn" required name="inscrt" type="file" />                
            </div>                        
        </div> 
        <div>
            <input type="radio" name="radio" id="" required>
            Must Be Available GPS Device In Your Vehicle
        </div>
        
        </div>
        <input type="button" id="btnPrevious" value="Previous" class="btn btn-secondary" onclick="ButtonClick(-1)" name="Previous" />
        <input type="submit" id="btnNext" value="Next" class="btn btn-primary" onclick="ButtonClick(1); window.reload();" name="Next" />

    </form>
</div>
<!----edit-modal end--------->


    




    



