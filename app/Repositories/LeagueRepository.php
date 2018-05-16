<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14.05.2018
 * Time: 20:55
 */

namespace App\Repositories;

use App\Models\League;
use App\Models\Team;

class LeagueRepository
{
    protected $model;
    protected $team;
    public $result = array();

    /**
     * LeagueRepository constructor.
     * @param League $model
     * @param Team $team
     */
    public function __construct(League $model, Team $team)
    {
        $this->model = $model;
        $this->team = $team;

    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->team->leftJoin('league', 'teams.id', '=', 'league.team_id')->orderBy('league.points', 'DESC')->get();
    }
    /**
     * @return mixed
     */
    public function getTeams()
    {
        return $this->team->pluck('id');
    }

    /**
     *
     */
    public function createLeague()
    {
        $result = $this->model->get();
        if ($result->isEmpty()) {
            foreach ($this->getTeams() as $value) {
                $data = ['team_id' => $value, 'points' => 0, 'played' => 0, 'won' => 0, 'lose' => 0, 'draw' => 0, 'goal_drawn' => 0];
                $this->model->create($data);
            }
        }


    }

    /**
     * @param array $data
     * @param $team_id
     * @return mixed
     */
    public function updateLeauge($data = array(), $team_id)
    {
        return $this->model->where('team_id', '=', $team_id)->update($data);
    }

    /**
     * @param $team_id
     * @return mixed
     */
    public function getLeaugeByTeamId($team_id)
    {
        return $this->model->where('team_id', $team_id)->first();
    }

    /**
     *
     */
    public function truncateLeauge()
    {
        $this->model->truncate();
    }


}