import { Component, OnInit } from '@angular/core';
import { FormGroup, FormBuilder } from '@angular/forms';

@Component({
  selector: 'app-new-post-page',
  templateUrl: './new-post-page.component.html',
  styleUrls: ['./new-post-page.component.scss']
})
export class NewPostPageComponent implements OnInit {

  postForm: FormGroup;

  constructor(private fb: FormBuilder) { }

  ngOnInit() {
    this.postForm = this.fb.group({
      title: ''
    });
  }

  formSubmit() {
    console.log("submitted");
  }

  formDraft() {
    console.log("drafted");
  }

  formPreview() {
    console.log("previewed");
  }

}
