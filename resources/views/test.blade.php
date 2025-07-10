こんにちは
@foreach ($users as $user)
    <p>
        {{$user->name}}さんはユーザーです。
    </p>
@