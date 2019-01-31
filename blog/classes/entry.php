<?php

class Entry
{
    private $id;
    private $date;
    private $author;
    private $title;
    private $content;
    private $dbh;
    private $excerpt;


    public function __construct()
    {
        $this->dbh = new PDO("mysql:dbname=Blog;host=localhost", 'root', 'zeez3020');
    }
    public function createNew()
    {
        $this->setByParams(-1, date("d.m.Y h:m"), $author, $title, $excerpt);
    }
    public function createNewFromPOST($post)
    {
        $this->createNew(
            $post['entry_author'],
            $post['entry_excerpt'],
            $post['entry_title'],
            $post['entry_content']
        );
    }
    public function setByParams($id, $date, $author, $title, $excerpt)
    {
        $this->id = $id;
        $this->date = $date;
        $this->author = $author;
        $this->title = $title;
        $this->excerpt = $excerpt;
    }

    public function setByRow($row)
    {
        $this->setByParams(
            $row['entry_id'],
            $row['entry_date'],
            $row['entry_author'],
            $row['entry_excerpt'],
            $row['entry_title'],
            $row['entry_content']
        );

    }
    public function sqlInsertEntry($author, $title, $content)
    {
        $query = "Insert into entries (entry_author ,entry_title,entry_content)
          values(
              :entry_author,  :entry_title , :entry_content);";
        $stmt = $this->dbh->prepare($query);
        $result = $stmt->execute(array(
            ':entry_author' => $author,
            ':entry_title' => $title,
            ':entry_content' => $content
        ));
        $query = 'SELECT id FROM entries WHERE entry_author = :entry_auther ORDER BY id DESC LIMIT 1';
        $stmt = $this->dbh->prepare($query);
        $result = $stmt->execute(array(
            ':entry_auther' => $author
        ));
        $this->id = $stmt->fetch(PDO::FETCH_ASSOC)['entry_id'];
        return $result;
    }
    public function sqlSelectEntry($limit)
    {
        $query = 'SELECT * from entries limit :limitt;';
        $stmt = $this->dbh->prepare($query);
        $result = $stmt->execute(array(
            ':limitt' => $limit
        ));
        $entry = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->setByRow($entry);
        return $entry;

    }
    public function sqlUpdateEntryById($entry_id)
    {
        $query = 'UPDATE entries SET
                  entry_author = :entry_author,
                  entry_title=:entry_title,
                  entry_content=:entry_content,
                  entry_excerpt=:entry_excerpt
                  where entry_id=:entry_id ;';
        $stmt = $this->dbh->prepare($query);
        $result = $stmt->execute(array(
            ':entry_author' => $this->author,
            ':entry_title' => $this->title,
            ':entry_content' => $this->content,
            ':entry_excerpt' => $this->excerpt,
            ':entry_id' => $this->id

        ));
        return $result;
    }
    public function validateString()
    {

    }
    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of date
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of date
     *
     * @return  self
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get the value of author
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set the value of author
     *
     * @return  self
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get the value of content
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set the value of content
     *
     * @return  self
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get the value of excerpt
     */
    public function getExcerpt()
    {
        return $this->excerpt;
    }

    /**
     * Set the value of excerpt
     *
     * @return  self
     */
    public function setExcerpt($excerpt)
    {
        $this->excerpt = $excerpt;

        return $this;
    }

    /**
     * Get the value of title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }
}



?>