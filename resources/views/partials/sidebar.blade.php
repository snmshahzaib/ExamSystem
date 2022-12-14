@can('isTeacher')
<div class="border-end bg-white" id="sidebar-wrapper">
    <div class="list-group list-group-flush">
        <div class="dropdown">
            <a class="btn btn-white dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
              Exams
            </a>
            <ul class="dropdown-menu  p-3" aria-labelledby="dropdownMenuLink">
              <li><a class="dropdown-item" href="{{ route('papers.index') }}">Show Papers</a></li>
              <li><a class="dropdown-item" href="{{ route('papers.create') }}">Add New Paper</a></li>
              <li><a class="dropdown-item" href="">Mark Papers</a></li>
            </ul>
          </div>
        <a class="list-group-item list-group-item-action list-group-item-light p-3" href=" {{ route('subjects.index') }} ">Subjects</a>
        <a class="btn btn-white dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
            Questions
          </a>
          <ul class="dropdown-menu  p-3" aria-labelledby="dropdownMenuLink">
            <li><a class="dropdown-item" href="{{ route('mcqs.create')}}">Add MC Questions</a></li>
            <li><a class="dropdown-item" href="{{ route('subjectives.create') }}">Add Subjective Question</a></li>
            <li><a class="dropdown-item" href="{{ route('truefalsequestions.create') }}">Add True/False Question</a></li>
            <li><a class="dropdown-item" href="{{ route('questions.index') }}">All Questions</a></li>
          </ul>
        </div>
        <a class="list-group-item list-group-item-action list-group-item-light p-3" href="studentanswers">Answers</a>
    </div>
</div>
<div id="page-content-wrapper">    
@elsecan('isStudent')
<div class="border-end bg-white" id="sidebar-wrapper">
  <div class="list-group list-group-flush">
      <div class="dropdown">
          <a class="btn btn-white dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
            My Subjects
          </a>
          <ul class="dropdown-menu  p-3" aria-labelledby="dropdownMenuLink">
            <li><a class="dropdown-item" href="{{ route('registersubjects.index') }}">Registered Subjects</a></li>
            <li><a class="dropdown-item" href="{{route('registersubjects.create')}}">Register Subject</a></li>
          </ul>
      </div>
      <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{route('answers.index')}}">My Exams</a>
      <a class="list-group-item list-group-item-action list-group-item-light p-3" href="">My Result</a>
  </div>
</div>
<div id="page-content-wrapper">
@endcan