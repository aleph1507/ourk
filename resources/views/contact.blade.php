@extends('master')

@section('content')
    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Контакт
                        <strong>О.О.У. Ристо Крле</strong>
                    </h2>
                    <hr>
                </div>
                <div class="col-md-8">
                    <!-- Embedded Google Map using an iframe - to select your location find it on Google maps and paste the link as the iframe src. If you want to use the Google Maps API instead then have at it! -->
                    {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1276.4090629219668!2d21.597074543125782!3d41.967160262097806!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13543918270532a9%3A0xbd98e7d5ffe099e8!2sKadino%2C+Macedonia+(FYROM)!5e1!3m2!1sen!2s!4v1487712782387" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe> --}}
                    <iframe src="https://www.google.com/maps/d/embed?mid=1D0BZGcPihvBwJnoy-_jL-Z97gpw" width="640" height="480"></iframe>
                </div>
                <div class="col-md-4">
                    <p>Телефон:
                        <strong>+2 2561 540</strong>
                    </p>
                    <p>Email:
                        <strong><a href="mailto:ristokrle_ou@yahoo.com">ristokrle_ou@yahoo.com</a></strong>
                    </p>
                    <p>Адреса:
                        <strong>Улица Број
                            <br>Н М Кадино, Општина Илинден</strong>
                    </p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        {{-- <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Контакт
                        <strong>формулар</strong>
                    </h2>
                    <hr>
                    <p>Пратете ни порака, ќе ја разгледаме и ќе Ви одговориме во најбрз можен рок.</p>
                    <form role="form" action={{ url('/contact') }} method="POST">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="form-group col-lg-4">
                                <label>Име</label>
                                <input type="text" name="ime" id="ime" class="form-control">
                            </div>
                            <div class="form-group col-lg-4">
                                <label>Емаил адреса</label>
                                <input type="email" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group col-lg-4">
                                <label>Телефонски Број</label>
                                <input type="tel" name="tel" id="tel" class="form-control">
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group col-lg-12">
                                <label>Порака</label>
                                <textarea class="form-control" name="poraka" id="poraka" rows="6"></textarea>
                            </div>
                            <div class="form-group col-lg-12">
                                <input type="hidden" name="save" value="contact">
                                <button type="submit" class="btn btn-default">Прати</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> --}}

    </div>
    <!-- /.container -->
    
@endsection