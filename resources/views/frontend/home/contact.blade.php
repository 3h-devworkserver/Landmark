<section id="seventh" class="contact-wrapper bg-image" style="background-image:url( {{ asset('assets/img/frontpage~7~contact.jpg') }});">  
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                @if($contacts)
                 @foreach($contacts as $contact)
                    <div class="address-block">
                                @if($contact->title)<h4> {{$contact->title}} :</h4>@endif
                                @if($contact->office_name)<p>{{ $contact->office_name}} </p>@endif
                                 @if($contact->address)<p>{{$contact->address}}</p>@endif
                                 @if($contact->phone)<p>Tel: {{$contact->phone}}</p>@endif
                                 @if($contact->email)<p>E-mail: <a href="mailto:{{$contact->email}}">{{$contact->email}}</a></p>@endif
                    
                    </div>
                 @endforeach
                 @endif
             <ul class="list-unstyled list-inline social-links">
                            @if($sociallink->facebook != '#')
                            <li class="facebook"><a href="{{$sociallink->facebook}}"><i class="fa fa-facebook"></i></a></li>
                            @endif
                            @if($sociallink->twitter != '#')
                            <li class="twitter"><a href="{{$sociallink->twitter}}"><i class="fa fa-twitter"></i></a></li>
                            @endif
                            @if($sociallink->google_plus != '#')
                            <li class="google"><a href="{{$sociallink->google_plus}}"><i class="fa fa-google-plus"></i></a></li>
                            @endif
                            @if($sociallink->youtube != '#')
                            <li class="youtube"><a href="{{$sociallink->youtube}}"><i class="fa fa-youtube"></i></a></li>
                            @endif
                            @if($sociallink->tumblr != '#')
                            <li class="tumblr"><a href="{{$sociallink->tumblr}}"><i class="fa fa-tumblr"></i></a></li>
                            @endif
                            @if($sociallink->pinterest != '#')
                            <li class="pinterest"><a href="{{$sociallink->pinterest}}"><i class="fa fa-pinterest"></i></a></li>
                            @endif
                            @if($sociallink->linkedin != '#')
                            <li class="linkedin"><a href="{{$sociallink->linkedin}}"><i class="fa fa-linkedin"></i></a></li>
                            @endif
                            @if($sociallink->vimeo != '#')
                            <li class="vimeo"><a href="{{$sociallink->vimeo}}"><i class="fa fa-vimeo"></i></a></li>
                            @endif
            </ul>
              
                <a href="#home" class="up-arrow">
                    <i class="fa fa-angle-up"></i>
                </a>
            </div>
        </div>
    </div>
</section>