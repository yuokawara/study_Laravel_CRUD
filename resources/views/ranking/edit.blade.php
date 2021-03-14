<!DOCTYPE html>
<html>
<div class="container">
    <div class="main">
      <div>
        <div>
          @include('common.errors')
          <form action="{{ route('ranking.update',$ranking->id) }}" method="POST">
            @method('put')
            @csrf
            <div>
                <label class="mb-2 uppercase font-bold" for="name">NAME</label>
                <input class="border py-2 px-3 text-grey-darkest" type="text" name="name" id="name" placeholder="{{$ranking->name}}">
            </div>
            <div>
            <label class="mb-2 uppercase font-bold" for="point">POINT</label>
                <input class="border py-2 px-3 text-grey-darkest" type="number" name="point" id="point" placeholder="{{$ranking->point}}">
            </div>
            <div>
              <a href="{{ route('ranking.index') }}">
                戻る
              </a>
              <button type="submit">
                更新
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</html>