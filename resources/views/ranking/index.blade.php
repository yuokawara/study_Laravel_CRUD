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
                  <p>{{$ranking->ranking}}</p>
                </td>
                <td class="py-4 px-6 border-b border-grey-light">{{$ranking->point}}</td>
                <td class="py-4 px-6 border-b border-grey-light flex justify-center">
                  <!-- 更新ボタン -->
                  <!-- 削除ボタン -->
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
</div>
</html>