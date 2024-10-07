@extends('layout.layout')

@section('content')
    <main>
        @component('components.profile.infoUser',[
            'user'=>$user,
            'courses'=>$courses
        ])
        @endcomponent

        @component('components.float',[
          'info_value'=>$info_value
          ])
        @endcomponent
    </main>
@endsection

@section('script')
    <script>
      const tabs = document.querySelectorAll('[data-tab-target]')
      const tabContents = document.querySelectorAll('[data-tab-content]')

      tabs.forEach(tab => {
        tab.addEventListener('click', () => {
          const target = document.querySelector(tab.dataset.tabTarget)
          tabContents.forEach(tabContent => {
            tabContent.classList.remove('active3')
          })
          tabs.forEach(tabs => {
            tabs.classList.remove('active5')
          })
          tab.classList.add('active5')
          target.classList.add('active3')
        })
      })
    </script>
@endsection
