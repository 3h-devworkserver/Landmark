@extends('frontend.master')
@section('content')
<section class="main-wrapper register-form">
<div class="container">
	<div class="row">
		 <div class="col-md-12 col-sm-12">
      <div class="formwrapper">
                        <form method="post" action="javascript:;" name="eventform" id="eventform">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <div class="form-group">
                            <label>Name<span>*</span></label>
                            <input type="text" class="form-control required fullname" name="fullname" placeholder="Enter Name" />
                          </div>
                          <div class="form-group">
                            <label>Email<span>*</span></label>
                            <input type="email" class="form-control required email" name="email" placeholder="Enter Email" />
                          </div>
                          
                          <div class="form-group">
                            <label>Phone Number<span>*</span></label>
                            <input type="text" class="form-control required number" name="phone" placeholder="Enter Phone Number" />
                          </div>
                            <div class="form-group">
                                <label>Address<span>*</span></label>
                                <input type="text" name="address" id="" cols="30" rows="10"  class="form-control required address" placeholder="Enter Address" />
                            </div> 
                            <div class="form-group">
                                <label>Desired Course<span>*</span></label>
                                <input type="text" name="course" id="" cols="30" rows="10"  class="form-control required course" placeholder="Enter Course" />
                            </div>
                             <div class="form-group">
                                <label>Qualification<span>*</span></label>
                                <input type="text" name="qualification" id="" cols="30" rows="10"  class="form-control required qualification" placeholder="Enter Qualification" />
                            </div>
                          <input type="submit" class="btn btn-default" value="Submit">
                          <img src="{{ asset('/img/loading.gif') }}" id="imgloader" style="display:none;" height="20" width="20">
                        </form>
                      </div>
                        <div class="errormsg" style="display:none;">Something Went Wrong!</div>
                    </div>
	</div>
</div>
</section>
@stop