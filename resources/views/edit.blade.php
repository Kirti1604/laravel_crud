<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
        <link rel="stylesheet" href="{{asset('asset/my.css')}}">

        <title>update</title>
        <style>
        label {
            font-size: larger;
            color: black;
        }

        form {
            display: flex;
            width: 100%;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        form i {
            float: right;
            cursor: pointer;
        }


        button {
            padding: 15px;
            margin: 10px 0px;
            width: 80px;
            margin-left: 100px;
        }
    </style>
    </head>
    <body>
    <div class="topnav">
        <h1>INTERNSHIP PORTAL</h1>
    </div>
            
        <form name="addform" onsubmit="return validateForm()"enctype="multipart/form-data" method="post" action="/update/{{$crud->id}}">
            <div class="form-group col-md-6">
            @method('PATCH')    
                @csrf
             
                
            
                <div class="form-group">
                <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" autocomplete="off" value="{{$crud->name}}">
                    <b><label id="nameerror" style="visibility:hidden; color:red; ">Name Is Requierd</label></b>
                    <b> <span style="color:red;">@error('name') {{$message}}@enderror</span></b>
                </div>
                <div class="form-group">
                    <label for="name">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" autocomplete="off" value="{{$crud->email}}">
                    <b><label id="mailerror" style="visibility:hidden; color:red; ">Email Is Requierd</label></b>
                    <b><label id="msg" style="color:red;"></label></b>
                    <b> <span style="color:red;">@error('mail'){{$message}}@enderror</span></b>
                          @if ($errors->has('email'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('email') }}</strong>
                              </span>
                          @endif
                    
                </div>

               
                    <label for="mail">Address</label>
                    <textarea class="form-control" id="address" name="address" placeholder="Enter your address" autocomplete="off" ><?php echo "{$crud->address}" ;?></textarea>
                    <b><label id="addresserror" style="visibility:hidden; color:red; ">Address Is Requierd</label></b>
                    <b> <span style="color:red;">@error('address') {{$message}}@enderror</span></b>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" autocomplete="off" disabled value="{{$crud->password}}">
                    <i class="far fa-eye" id="togglePassword" style="float: left; cursor: pointer; margin-top:6px;"></i><br>
                    <b><label id="msg1" style="color:red;"></label></b>
                    <b><label id="passworderror" style="visibility:hidden; color:red; ">Password Is Requierd minimum 4 char</label></b>
                    <b> <span style="color:red;">@error('password') {{$message}}@enderror</span></b>

                    <div>
                <label for="type"> Select Internship Period </label>
                <select class="form-control" id="period" name="period">
                    <option value="">--Select--</option>
                    @foreach($month as $mrow)
                    <option value="{{$mrow->id}}" <?php if ($crud->period == $mrow->id) {echo $mrow->period ? 'selected' : '';} ?>> {{ $mrow->period}} </option>
                    @endforeach
                </select>
                <b><label id="montherror" style="visibility:hidden; color:red; ">Requierd field</label></b>
                <b> <span style="color:red;">@error('period') {{$message}}@enderror</span></b>

            </div>
            
            
            <div>
                <label for="type"> Select Preferable Language </label>
                
                <select class="form-control multiple-select"id="lang" name="lang[]" multiple="multiple" >
                    <option value="">--Select--</option>

                    @foreach($lang as $row)
                    <!-- <h1>{{$row}}</h1> -->
                    <option value="{{$row->langid}}" <?php echo in_array($row->langid,$arr) ? 'selected' : '' ?>> {{ $row->lang}} </option>
                    @endforeach
                </select>
                <b><label id="langerror" style="visibility:hidden; color:red; ">Select at least one</label></b>
                <b> <span style="color:red;">@error('lang') {{$message}}@enderror</span></b>
            </div>

            <div>
                <input type="file" id="file" name="file[]" placeholder="upload cv ">
                <b><label id="fileerror" style="visibility:hidden; color:red; ">Upload cv</label></b>
                <b> <span style="color:red;">@error('file') {{$message}}@enderror</span></b>

            </div>


                </div>
                <br />
                <button type="submit" class="btn btn-primary">Update</button>
             
            </div>
        </form>
    <script src="{{asset('asset/my.js')}}"></script>
    </body>
</html>