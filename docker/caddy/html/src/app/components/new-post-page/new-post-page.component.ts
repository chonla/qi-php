import { Component, OnInit } from '@angular/core';
import { FormGroup, FormBuilder } from '@angular/forms';
import { PostService } from 'src/app/services/post.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-new-post-page',
  templateUrl: './new-post-page.component.html',
  styleUrls: ['./new-post-page.component.scss']
})
export class NewPostPageComponent implements OnInit {

  postForm: FormGroup;
  formLocked: boolean;
  status: string;

  constructor(private fb: FormBuilder, private ps: PostService, private router: Router) {
    this.formLocked = false;
  }

  ngOnInit() {
    this.postForm = this.fb.group({
      title: '',
      body: ''
    });
  }

  publishPost() {
    this.formLocked = true;
    this.postForm.disable();
    this.ps.create(this.postForm.value).subscribe({
      next: result => {
        this.postForm.setValue({
          title: result.title,
          body: result.body
        });
        this.status = result.status;
        this.formLocked = false;
        this.postForm.enable();
      },
      error: e => {
        this.formLocked = false;
      }
    });
  }

  draftPost() {
    this.formLocked = true;
    this.postForm.disable();
    this.ps.createDraft(this.postForm.value).subscribe({
      next: result => {
        this.router.navigate(['/admin','posts','edit',result.id]);
      },
      error: e => {
        this.formLocked = false;
        this.postForm.enable();
      }
    });
  }

  formPreview() {
    console.log("previewed");
  }

}
