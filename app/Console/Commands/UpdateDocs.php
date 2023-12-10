<?php

namespace App\Console\Commands;

use App\Documentation;
use CzProject\GitPhp\Git as GitRepository;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;

class UpdateDocs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'docs:update {doc?} {version?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update docs from GitHub.';

    /**
     * Execute the console command.
     *
     * @param  \App\Documentation $docs
     * @param  \PHPGit\Git $git
     * @param  Illuminate\Filesystem\Filesystem $files
     * @return mixed
     */
    public function handle(Documentation $docs, Filesystem $files)
    {

        $this->docs = $docs;
        $this->files = $files;

        $doc = $this->argument('doc');
        $version = $this->argument('version');

        if ($doc) {
            $docs = [$doc];
        } else {
            $docs = array_keys($this->docs->getDocs());
        }

        foreach ($docs as $doc) {
            $this->updateDoc($doc, $version);
        }

        $this->info('Docs updated!');
    }

    /**
     * Update documentation.
     *
     * @param  string $doc
     * @param  string $version
     * @return void
     */
    protected function updateDoc($doc, $version = null)
    {

        $this->cleanRepositoryFolders();

        $path = config('docs.path');
        $git = new GitRepository;


        if (! $data = Arr::get($this->docs->getDocs(), $doc)) {
            return;
        }


        foreach ($this->docs->getDocs() as $key => $data) {


            if (! $this->files->exists("$path/$key")) {
               $git->cloneRepository($data['repository'], "$path/$key");

            }



        }
        foreach ($this->docs->getDocs() as $key => $data) {
        $repo = $git->open("$path/$key");


        $repo->checkout('master');
        $repo->pull('origin');





        if ($version) {
            $versions = [$version];
        } else {
            $versions = $this->getVersions($repo->getBranches());
        }

        $directoryPath = public_path("images/docs/$doc/");
        $this->createAndMoveDirectory($directoryPath);

        foreach ($versions as $version) {


            $repo->pull('origin', [$version]);

            $repo->checkout($version);

            $storagePath = storage_path("docs/$doc/$version");




            $this->files->copyDirectory("$path/$doc/docs", $storagePath);
            $this->createAndMoveDirectory($directoryPath, $version);
            $this->files->moveDirectory("$storagePath/images", $directoryPath."/{$version}/images", true);



            $this->docs->clearCache($doc, $version);
        }

        }

    }

    /**
     * Get documentation versions from the repository.
     *
     * @param  array $branches
     * @return array
     */
    protected function getVersions(array $branches)
    {
        $versions = [];

        foreach ($branches as $branch) {
            preg_match('/origin\/(.*)/', $branch, $matches);

            if (isset($matches[1]) && ! Str::contains($matches[1], 'HEAD ->')) {
                $versions[] = $matches[1];
            }
        }

        return $versions;
    }


    private function cleanRepositoryFolders(): void
    {



        $publicDocsPath = public_path('images/docs');
        $storageDocsPath = storage_path('images/docs');

        File::ensureDirectoryExists($publicDocsPath);
        File::ensureDirectoryExists($storageDocsPath);

        $path = config('docs.path');
        $git = new GitRepository;

        $directoriesToKeep = collect($this->docs->getDocs())->pluck('name');

        $finder = new Finder();
        $directories = $finder->in([$storageDocsPath, $publicDocsPath])->depth(0)->directories();


        foreach ($directories as $directory) {

            if (!$directoriesToKeep->contains($directory->getFilename())) {
                File::deleteDirectory($directory->getRealPath());
            }
        }
    }


    function createAndMoveDirectory($directoryPath, $version = null): void
    {
        $directoryPath = rtrim($directoryPath, '/');

        if ($version) {
            $directoryPath .= "/{$version}";
        }

        // Create the directory and any missing parent directories
        File::makeDirectory($directoryPath, 0777, true, true);
    }


}
