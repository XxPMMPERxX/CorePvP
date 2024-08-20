WITH core_destroy_count as (
    select
        jgh.game,
        jgh.team,
        case 
            when dch.game IS NULL then 0
            else
            count(jgh.team)
        end as count
    from
        join_game_histories jgh
    left join 
        destroy_core_histories dch
    on 
        dch.game = jgh.game
    and
        dch.player = jgh.player
    GROUP BY
        dch.game,
        jgh.team
),
win_teams_prepare as (
    select 
        RANK() OVER (partition BY game ORDER BY count desc) rank,
        core_destroy_count.*
    from 
        core_destroy_count
),
win_teams as (
    select * from win_teams_prepare where rank = 1
)

select count(*) from win_teams where (game, team) IN (select game, team from join_game_histories where player = 1);
