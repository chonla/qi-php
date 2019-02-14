import { Component, OnInit } from '@angular/core';
import { FormGroup, FormBuilder } from '@angular/forms';
import { PostService } from 'src/app/services/post.service';
import { Router, ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-edit-post-page',
  templateUrl: './edit-post-page.component.html',
  styleUrls: ['./edit-post-page.component.scss']
})
export class EditPostPageComponent implements OnInit {

  postForm: FormGroup;
  formLocked: boolean;
  status: string;

  constructor(private fb: FormBuilder, private ps: PostService, private router: Router, private activatedRoute: ActivatedRoute) {
    this.formLocked = false;
  }

  ngOnInit() {
    this.ps.get(this.activatedRoute.snapshot.paramMap.get('id')).subscribe(post => {
      this.postForm = this.fb.group({
        id: post.id,
        title: post.title,
        body: post.body
      });
      this.status = post.status;
    });
  }

  publishPost() {
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

  draftPost() {
    this.formLocked = true;
    this.ps.updateDraft(this.postForm.value).subscribe({
      next: result => {
        this.router.navigate(['/admin','posts','edit',result.id]);
      },
      error: e => {
        this.formLocked = false;
      }
    });
  }

  formPreview() {
    console.log("previewed");
  }

}
