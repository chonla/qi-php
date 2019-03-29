export const environment = {
  production: true,
  baseUrl: 'http://localhost',
  apiBaseUrl: 'http://localhost/api',
  editor: {
    toolbar: [
      ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
      ['blockquote', 'code-block'],

      [{ 'header': 1 }, { 'header': 2 }],               // custom button values
      [{ 'list': 'ordered'}, { 'list': 'bullet' }],
    ],
    theme: 'bubble',
    sanitize: false
  }
};
