<?php

/**
 * @SWG\Get(
 *     tags={"Metals"},
 *     path="/api/metals",
 *     summary="Get metals",
 *     description="Get metals costs for 2 days",
 *
 *     @SWG\Response(response=200, description="OK: The request has succeeded."),
 *     @SWG\Response(response=500, description="INTERNAL SERVER ERROR"),
 *     security={{"Bearer":{}}}
 * )
 */
