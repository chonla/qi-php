import { Injectable } from '@angular/core';
import { Post } from '../models/post';
import { HttpClient } from '@angular/common/http';
import { environment } from '../../environments/environment';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class PostService {

  constructor(private http: HttpClient) { }

  create(post: Post): Observable<Post> {
    return this.http.post<Post>(`${environment.apiBaseUrl}/posts`, post);
  }

  createDraft(post: Post): Observable<Post> {
    return this.http.post<Post>(`${environment.apiBaseUrl}/posts/draft`, post);
  }

  saveDraft(post: Post): Observable<Post> {
    return this.http.patch<Post>(`${environment.apiBaseUrl}/posts/${post.id}/draft`, post);
  }

  publish(post: Post): Observable<Post> {
    return this.http.patch<Post>(`${environment.apiBaseUrl}/posts/${post.id}/publish`, post);
  }

  get(id: string): Observable<Post> {
    return this.http.get<Post>(`${environment.apiBaseUrl}/posts/${id}`);
  }
}
