import { Component, OnInit } from '@angular/core';
import { FormGroup, FormBuilder } from '@angular/forms';
import { PostService } from 'src/app/services/post.service';

@Component({
  selector: 'app-new-post-page',
  templateUrl: './new-post-page.component.html',
  styleUrls: ['./new-post-page.component.scss']
})
export class NewPostPageComponent implements OnInit {

  postForm: FormGroup;
  formLocked: boolean;
  status: string;

  constructor(private fb: FormBuilder, private ps: PostService) {
    this.formLocked = false;
  }

  ngOnInit() {
    this.postForm = this.fb.group({
      title: '',
      body: ''
    });
  }

  formSubmit() {
    this.formLocked = true;
    this.ps.create(this.postForm.value).subscribe({
      next: result => {
        this.postForm.setValue({
          title: result.title,
          body: result.body
        });
        this.status = result.status;
        this.formLocked = false;
      },
      error: e => {
        this.formLocked = false;
      }
    });
  }

  formDraft() {
    console.log("drafted");
  }

  formPreview() {
    console.log("previewed");
  }

}
