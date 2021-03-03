<!DOCTYPE html>
<html>  
    <div class="container">
        <div class="main">
            <div class="content">
                <div class="content_item">
                    <p class="font-bold">NAME</p>
                    <p class="py-2 px-3" id="name">{{$ranking->name}}</p>
                </div>
                <div class="content_item">
                    <p class="font-bold">POINT</p>
                    <p class="py-2 px-3" id="point">{{$ranking->point}}</p>
                </div>
                <a href="{{ route('ranking.index') }}">戻る</a>
            </div>
        </div>
    </div>
</html>