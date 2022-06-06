class File
{
    public $path;
    public function __construct(string $path)
    {
        if (file_exists($path)) {

            $this->path = __DIR__ . '/' . $path;
        } else {
            echo 'Файла не сущетсвует';
        }
    }
    public function read(): string
    {
        $str = file_get_contents($this->path);
        return $str;
    }
    public function write(string $text)
    {
        file_put_contents($this->path, $text, FILE_APPEND);
    }
    public function create($path)
    {
        file_put_contents($path, null);
    }

}
