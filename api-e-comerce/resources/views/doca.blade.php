@extends('layouts.app')

@section('content')
    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    http://127.0.0.1:8000/api/product
                </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                   <code>
                       {<br>
                       "id": 7,<br>
                       "image": "http://127.0.0.1:8000/storage/images/1701474959_MD827.jpg",<br>
                       "name": "APPLE Earpods in-ear headphones",<br>
                       "description": "PREMIUM QUALITY Are you looking for universal in-ear headphones that will provide you with high sound quality,
                       freedom of conversation and comfort of wearing? The APPLE Earpods model with a built-in microphone will meet all your expectations.
                       Another advantage of the device is its minimalist design . Headphones in white colors look modern and stylish.",<br>
                       "category": 7<br>
                       },
                   </code>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                    http://127.0.0.1:8000/api/category
                </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <code>
                        [<br>
                        {<br>
                        "id": 1,<br>
                        "name": "Lego"<br>
                        },<br>
                        {<br>
                        "id": 5,<br>
                        "name": "Hairdryer"<br>
                        },<br>
                        {<br>
                        "id": 6,<br>
                        "name": "Phone"<br>
                        },<br>
                        {<br>
                        "id": 7,<br>
                        "name": "Headphones"<br>
                        }<br>
                        ]
                    </code>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                    Additional Information about how work with backend part
                </button>
            </h2>
            <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    На странице <strong>Product</strong> вы можете спокойно добавлять новые продукты, редактировать, а так же удалять.
                    <br>
                    На странице <strong>Categories</strong> так же сделана операция CRUD, где вы можете делать что вам угодно.
                    <br>
                    Вся операция CRUD на двух страницах сделана через модальные окна
                    <br>
                    1) это выглядит круто,
                    <br>
                    2) упрощает работу админу, который захотел то-то добавить новое.
                </div>
            </div>
        </div>
    </div>
@endsection
