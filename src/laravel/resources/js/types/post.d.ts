export type PostInfo = {
    id: number,
    book_id,
    book_title,
    author,
    published_date,
    evaluate: number,
    content: string,
    reading_date: Ymd
};

export type Ymd = {
  year: number | undefined;
  month: number | undefined;
  day: number | undefined;
};