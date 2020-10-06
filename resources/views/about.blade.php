@extends('template')
@section('title') A propos @endsection
@section('content')
    <h1 class="title">A propos</h1>
    <div class="row">
        <div class="col-md-6">
            <img src="/svg/teamspirit.svg" alt="" class="svgLanding">
        </div>
        <div class="col-md-6">
            <h2 class="title">Qui sommes nous ?</h2>
            <p class="paragraph">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam animi aperiam beatae earum provident quo reiciendis? Ab accusantium consequuntur debitis eos iusto, libero quas quia saepe similique ullam vero voluptate?</p>
        </div>

    </div>
    <div class="row">
        <div class="col-md-6">
            <h2 class="title">
                Notre culture
            </h2>
            <p class="paragraph">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad fugiat, vitae. Asperiores culpa, cumque, dolore dolorem eius eligendi est fugit inventore laboriosam modi optio perferendis quas rerum saepe voluptas voluptatem!</p>
            <p class="paragraph">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aliquam aliquid
                consequatur corporis dolor iste itaque maxime, natus nihil odio perspiciatis placeat quasi recusandae
                reprehenderit rerum sunt temporibus ullam voluptatem!</p>
        </div>
        <div class="col-md-6">
            <img src="/svg/playfulcat.svg" alt="" class="svgLanding">
        </div>
    </div>
    <hr>
    <h2 class="title">Nous contacter</h2>
    <p class="paragraph">Un problème ? contactez nous aux coordonnées suivantes :</p>
    <ul>
        <li class="paragraph">📧 Mail : <a href="mailto:example@example.com">example@example.com</a></li>
        <li class="paragraph">📞Téléphone : (+33) 06 06 06 06 06</li>
    </ul>
@endsection
