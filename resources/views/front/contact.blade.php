@extends('front.layouts.dizayn')

@section('title','elaqe')
@section('image','https://t4.ftcdn.net/jpg/03/37/96/33/360_F_337963325_EJuPjWslX3vAFxJ59L3y1cm6IsSfo07s.jpg')


@section('contact')

@if($errors->any())
  @foreach($errors->all() as $bsehv)
    <div class="alert alert-danger text-center" role="alert">
      <strong>{{$bsehv}}</strong>
    </div>
  @endforeach
@endif


@if(session('message'))
  <div class="alert alert-success text-center" role="alert">
    <strong>{{session('message')}}</strong>
  </div>
@endif

<div class="row gx-4 gx-lg-5 justify-content-center">
    <div class="col-md-10 col-lg-8 col-xl-7">
        <p>Bizimlə əlaqəyə keçə bilərsiz!</p>
        <div class="my-5">
            <form method="post" action="{{route('contactpostt')}}">
                @csrf
                <div class="form-floating">                             <!--{{old('name')}} eyer qeyd sehvdise qeydi geri getirirr-->
                    <input class="form-control" id="name" type="text" name="name" value="{{old('name')}}" placeholder="Ad.soyadınızı daxil edin..."  />
                    <label for="name">Ad/Soyad:</label>
                </div>
                <div class="form-floating">
                    <input class="form-control" id="email" type="email" name="email" value="{{old('email')}}" placeholder="Email adresinizi daxil edin..."  />
                    <label for="email">Email adresi:</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" id="topic" name="topic" aria-label="Mövzu seçin" >
                        <option value="" disabled selected>Mövzu seçin</option>
                        <option value="information">Məlumat</option>
                        <option value="help">Yardım</option>
                        <option value="general">Ümumi</option>
                    </select>
                    <label for="topic">Mövzu:</label>
                </div>

                <div class="form-floating">
                    <textarea class="form-control" id="message" name="message" placeholder="Mesajınızı daxil edin..." style="height: 12rem" >{{old('message')}}</textarea>
                    <label for="message">Mesajınız:</label>
                </div>
                <br/>
                
                <!---->
                
                <div class="d-none" id="submitSuccessMessage">
                    <div class="text-center mb-3">
                        <div class="fw-bolder">Form submission successful!</div>
                        To activate this form, sign up at
                        <br />
                        <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                    </div>
                </div>
                <!-- Submit error message-->
                <!---->
                <!-- This is what your users will see when there is-->
                <!-- an error submitting the form-->
                <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                <!-- Submit Button-->
                <button class="btn btn-primary" id="submitButton" type="submit">Send</button>
            </form>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-default">
            <div class="card-body text-center">Panel Content</div>
        </div>
    </div>    
</div>

@endsection