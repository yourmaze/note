<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/test-font.css">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
    <header>
        <div class="uk-container">
            <div class="uk-flex uk-flex-middle uk-flex-wrap uk-flex-between@l">
                <div class="logo">
                    <img src="/img/logo.svg" alt="Линка логотип">
                </div>
                <div class="uk-width-3-5">
                    <div class="header-search">
                        <div class="uk-inline uk-width-1-1">
                            <span class="uk-form-icon mdi mdi-magnify"></span>
                            <input class="uk-input" placeholder="Поиск по закладкам">
                        </div>
                    </div>
                </div>
                <div class="header-nav">
                    <ul class="uk-iconnav uk-flex-center">
                        <li>
                            <button> <span class="mdi mdi-plus mdi-36px" type="button"></span> </button>
                            <div class="small-dropdown" uk-dropdown>
                                <ul class="uk-nav uk-dropdown-nav">
                                    <li class="uk-nav-header">Добавить</li>
                                    <li><a href="#add-bookmark" uk-toggle><span class="mdi mdi-bookmark-outline"></span> Закладку</a></li>
                                    <li><a href="#"><span class="mdi mdi-file-document-edit-outline"></span> Заметку</a></li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a href="#" uk-tooltip="Добавить ссылку"> <span class="mdi mdi-bell-outline"></span> </a>
                        </li>
                        <li>
                            <a href="#" uk-tooltip="Добавить ссылку"> <span class="icon-round mdi mdi-account-outline"></span> </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <div class="uk-container">
        <div class="uk-grid uk-child-width-1-6@xl">
            <div class="uk-margin-bottom">
                <div class="entity-card">
                    <div class="entity-img">
                        <img src="/img/boondocker_april_06.png" alt="">
                        <div class="entity-img__shadow"></div>
                    </div>
                    <div class="uk-position-top-left uk-margin-small-top uk-margin-small-left">
                        <button class="entity-actions" type="button">
                            <span class="mdi mdi-dots-horizontal"></span>
                        </button>
                        <div class="small-dropdown dropdown-with-triangle" uk-dropdown>
                            <ul class="uk-nav uk-dropdown-nav">
                                <li><a href="#"><span class="mdi mdi-pencil-outline"></span> Редактировать</a></li>
                                <li><a href="#"><span class="mdi mdi-arrow-right-top"></span> Переместить</a></li>
                                <li><a href="#"><span class="mdi mdi-delete-outline"></span> Удалить</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="entity-content">
                        <div class="entity-title">asdasd</div>
                        <div class="entity-info">qweqwe</div>
                    </div>
                </div>
            </div>
            @foreach($entities as $entity)
            <div class="uk-margin-bottom">
                <div class="entity-card">
                    <div class="entity-img">
                        <img src="/img/image.png" alt="">
                        <div class="entity-img__shadow"></div>
                    </div>
                    <div class="uk-position-top-left uk-margin-small-top uk-margin-small-left">
                        <button class="entity-actions" type="button">
                            <span class="mdi mdi-dots-horizontal"></span>
                        </button>
                        <div class="small-dropdown dropdown-with-triangle" uk-dropdown>
                            <ul class="uk-nav uk-dropdown-nav">
                                <li><a href="#"><span class="mdi mdi-pencil-outline"></span> Редактировать</a></li>
                                <li><a href="#"><span class="mdi mdi-arrow-right-top"></span> Переместить</a></li>
                                <li><a href="#"><span class="mdi mdi-delete-outline"></span> Удалить</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="entity-content">
                        <div class="entity-title">{{ $entity->title }}</div>
                        <div class="entity-info">{{ $entity->url }}</div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>


    <div id="add-bookmark" uk-modal>
        <div class="uk-modal-dialog">
            <button class="uk-modal-close-default" type="button" uk-close></button>
            <div class="uk-grid uk-height-1-1">
                <div class="uk-width-1-2">
                    <h2 class="uk-modal-title">Добавить закладку</h2>
                    <hr class="uk-margin-remove">
                    <div class="uk-modal-body">
                        <div class="uk-position-relative">
                            <div class="uk-margin-bottom">
                                <input class="uk-input" placeholder="Адрес страницы">
                            </div>
                            <div class="uk-inline uk-margin-bottom uk-width-1-1">
                                <span class="uk-form-icon uk-form-icon-flip mdi mdi-chevron-down"></span>
                                <input class="uk-input" placeholder="Выберите папку">
                            </div>
                            <div class="uk-margin-bottom">
                                <input id="bookmark-title" class="uk-input" placeholder="Имя закладки">
                            </div>
                            <div class="uk-margin-medium-bottom">
                                <label><input class="uk-checkbox uk-margin-small-right" type="checkbox"> Для общего доступа</label>
                            </div>
                            <div class="uk-margin-bottom">
                                <input class="uk-input" placeholder="#Теги">
                            </div>

                            <div class="uk-text-right">
                                <div class="uk-button uk-button-primary" disabled="true">Готово</div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="uk-width-1-2">
                    <div class="uk-flex uk-flex-center uk-flex-middle uk-height-1-1 uk-width-1-1">
                        <div class="entity-card uk-width-small">
                            <div class="entity-img">
                                <img src="/img/image.png" class="uk-invisible" alt="">
                                <div class="entity-img__shadow"></div>
                            </div>
                            <div class="entity-content">
                                <div class="entity-title"></div>
                                <div class="entity-info"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<div id="app">
</div>

<script src="{{ mix('js/app.js') }}"></script>

    <script>

        $(document).ready(function(){
            $('#bookmark-title').on('input', function(){
                $('#add-bookmark .entity-title').html($(this).val());
            });
        });


        /*UIkit.notification({
            message: '<span class="mdi mdi-check-circle-outline"></span> <span class="uk-text-nowrap">Закладка добавлена</span>',
            status: 'primary',
            pos: 'bottom-center',
            timeout: 5000000
        });*/
        UIkit.notification({
            message: '<span class="mdi mdi-delete-outline"></span> <span class="uk-text-nowrap">Закладка удалена</span> <div class="uk-button uk-button-primary uk-button-small">Восстановить</div>',
            status: 'primary',
            pos: 'bottom-center',
            timeout: 5000000
        });
    </script>

</body>
</html>
