<?php

namespace App\Traits;

/**
 * A simple trait for creating a directory.
 *
 * It can be used anywhere in/by the application.. It is specially
 * recommended to use this for creating directories of user based
 * folders at the time of user registration.
 *
 */
trait CreateDirectory
{
    /**
     * Create the directory if the given path does not exist.
     *
     * @param   string  $path
     * @return  string
     */
    private function createDirectoryIfNotExists($path)
    {
        $envType     = env('APP_ENV');
        $hostingType = env('HOSTING_TYPE');

        if ($hostingType == 'shared') {
            $path = base_path() . '/../public_html' . $path;
        }

        if ($hostingType == 'cloud') {
            $path = public_path() . $path;
        }

        if (! file_exists($path)) {
            mkdir($path, 0775, true);
        }

        return $path;
    }

    /**
     * Get the public path depending upon the hosting type
     * set in the .env file.
     *
     * @return  string
     */
    protected function getPublicPath()
    {
        return env('HOSTING_TYPE') == 'shared'
                ? base_path() . '/../public_html/'
                : public_path() . '/';
    }
}
