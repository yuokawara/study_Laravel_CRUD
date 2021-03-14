<!DOCTYPE html>
<html>
<div class="container">
    <div>
      <div>
        <div>
          <table class="text-center w-full border-collapse">
            <thead>
              <tr>
                <th class="py-4 px-6 bg-grey-lightest font-bold">NAME</th>
                <th class="py-4 px-6 bg-grey-lightest font-bold">POINT</th>
                <th class="py-4 px-6 bg-grey-lightest font-bold">Delete or Edit</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($rankings as $ranking)
              <tr class="hover:bg-grey-lighter">
                <td class="py-4 px-6 border-b border-grey-light">
                <a href="{{ route('ranking.show', $ranking->id) }}">{{$ranking->name}}</a>
                  <!-- <p>{{$ranking->name}}</p> -->
                </td>
                <td class="py-4 px-6 border-b border-grey-light">{{$ranking->point}}</td>
                <td class="py-4 px-6 border-b border-grey-light flex justify-center">
                  <!-- 更新ボタン -->
                  <form action="{{ route('ranking.edit',$ranking->id) }}" method="GET">
                    @csrf
                    <button type="submit">
                      更新
                    </button>
                  </form>
                  <!-- 削除ボタン -->
                  <form action="{{ route('ranking.destroy',$ranking->id) }}" method="POST">
                    @method('delete')
                    @csrf
                    <button type="submit">
                      削除
                    </button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <a href="{{ route('ranking.create') }}">
                新規作成
          </a>
        </div>
      </div>
    </div>
</div>
</html>