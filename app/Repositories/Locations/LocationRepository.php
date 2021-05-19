<?php


namespace App\Repositories\Locations;


use App\Location;

class LocationRepository implements LocationRepositoryInterface
{
    /**
     * Get Location by it's ID
     *
     * @param $location_id int
     * @return Location
     */
    public function getById($location_id)
    {
        return Location::find($location_id);
    }

    /**
     * Get location by it's slug
     *
     * @param $location_slug string
     * @return Location
     */
    public function getBySlug($location_slug)
    {
        return Location::where('slug', $location_slug)->first();
    }

    /**
     * Update a location
     *
     * @param $location_id int
     * @param $location_data array
     *
     * @return Location
     */
    public function update($location_id, $location_data)
    {
        return Location::find($location_id)->update($location_data);
    }

    /**
     * Delete a location
     *
     * @param $location_id int
     */
    public function delete($location_id)
    {
        Location::destroy($location_id);
    }
}
