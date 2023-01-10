
  <!--Contact-->

    <section id="services" class="text-center text-light">
      <div class="img-ovarlay">
        <div class="container">
          <div class="row">
            <div class="col pt-5">
              <h2>Contact</h2>
              <p class="lead">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque, saepe.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!--Contact-us-->

    <section id="contact-us" class="py-5">
        <div class="container">
          <div class="row">

            <div class="col-md-8">
              <div class="card">
                <div class="card-body">
                  <h4 class="text-center">Please fill out this form to contact us</h4>
            @if(Session::get('msgSuccess'))
              <p class="text-success mt-5"><strong>Success! </strong>{{Session::get('msgSuccess')}}</p>
            @endif

            @if(Session::get('msgError'))
              <p class="text-danger mt-5"><strong>Error! </strong>{{Session::get('msgError')}}</p>
            @endif 
                  <form action="{{url('/messageSent')}}" method="post">
                    @csrf
                  <div class="row mt-4">
                    <div class="col-md-6">
                      <div class="form-group">
                          <input type="text" name="feedback_first_name" class="form-control" value="{{ old('feedback_first_name') }}" placeholder="First name">

                        @error('feedback_first_name')
                          <small class="text-danger">{{ $message }}</small>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="text" name="feedback_last_name" class="form-control" placeholder="Last Name" value="{{ old('feedback_last_name') }}">
                        @error('feedback_last_name')
                          <small class="text-danger">{{ $message }}</small>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="text" name="feedback_email" class="form-control" placeholder="Email" value="{{ old('feedback_email') }}">
                        @error('feedback_email')
                          <small class="text-danger">{{ $message }}</small>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="text" name="feedback_phone" maxlength="11" class="form-control" placeholder="Phone number" value="{{ old('feedback_phone') }}">
                        @error('feedback_phone')
                          <small class="text-danger">{{ $message }}</small>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">

                        <textarea name="feedback_message" placeholder="Message" class="form-control" rows="5">{{ old('feedback_message') }}</textarea>

                        @error('feedback_message')
                          <small class="text-danger">{{ $message }}</small>
                        @enderror

                      </div>
                    </div>
                    <div class="col-md-12">
                        <input type="submit" class="btn btn-block btn-dark" value="Send">
                    </div>
                  </div>
                  </form>

                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card">
                <div class="card-body">
                  <h4>Get In Touch</h4>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto, consequuntur.
                  </p>

                  <h4>Address</h4>
                  <p>
                    307/05, mirpur, Dhaka.
                  </p>

                  <h4>Email</h4>
                  <p>
                    sabrinasultanamukta123@gmail.com
                  </p>

                  <h4>Phone</h4>
                  <p class="mb-2">+8801537-171747</p>
                  <p>+8801716-599809</p>

                </div>
              </div>
            </div>

          </div>
      </div>
    </section>
